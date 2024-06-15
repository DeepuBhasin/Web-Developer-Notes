enum ProjectStatus {
  Active = "active",
  Finished = "finished",
}

interface IDraggable {
  dragStartHandler(event: DragEvent): void;
  dragEndHandler(event: DragEvent): void;
}

interface IDragTarget {
  dragOverHandler(event: DragEvent): void;
  dragLeaveHandler(event: DragEvent): void;
  dropHandler(event: DragEvent): void;
}

interface IValidate {
  label: string;
  value: string | number;
  required?: boolean;
  minLength?: number;
  maxLength?: number;
  min?: number;
  max?: number;
}

type Listener<T> = (items: T[]) => void;

class State<T> {
  protected listeners: Listener<T>[] = [];

  addListener(listener: Listener<T>) {
    this.listeners.push(listener);
  }

  protected notifyListeners(items: T[]) {
    for (const listenerFn of this.listeners) {
      listenerFn(items);
    }
  }
}

class ProjectState extends State<Project> {
  private static instance: ProjectState;
  private projects: Project[] = [];

  private constructor() {
    super();
  }

  static getInstance() {
    if (!this.instance) {
      this.instance = new ProjectState();
    }
    return this.instance;
  }

  addProject(title: string, description: string, people: number) {
    const newProject = new Project(
      Math.random().toString(),
      title,
      description,
      people,
      ProjectStatus.Active
    );

    this.projects.push(newProject);
    this.notifyListeners(this.projects);
  }

  moveProject(projectId: string, newStatus: ProjectStatus) {
    const project = this.projects.find((prj) => prj.id === projectId);
    if (project && project.status !== newStatus) {
      project.status = newStatus;
      this.notifyListeners(this.projects);
    }
  }
}

const projectState = ProjectState.getInstance();

function validateInput(input: IValidate): [boolean, string] {
  let isValid = true;
  let error = "";

  if (input.required && input.value.toString().trim().length === 0) {
    isValid = false;
    error = `Please enter a value in ${input.label}`;
    return [isValid, error];
  }

  if (
    input.minLength != null &&
    typeof input.value === "string" &&
    input.value.trim().length < input.minLength
  ) {
    isValid = false;
    error = `Please enter at least ${input.minLength} characters in ${input.label}`;
    return [isValid, error];
  }

  if (
    input.maxLength != null &&
    typeof input.value === "string" &&
    input.value.trim().length > input.maxLength
  ) {
    isValid = false;
    error = `Please enter at most ${input.maxLength} characters in ${input.label}`;
    return [isValid, error];
  }

  if (
    input.min != null &&
    typeof input.value === "number" &&
    input.value < input.min
  ) {
    isValid = false;
    error = `Please enter a value greater than ${input.min} for ${input.label}`;
    return [isValid, error];
  }

  if (
    input.max != null &&
    typeof input.value === "number" &&
    input.value > input.max
  ) {
    isValid = false;
    error = `Please enter a value less than ${input.max} for ${input.label}`;
    return [isValid, error];
  }

  return [isValid, error];
}

class Project {
  constructor(
    public id: string,
    public title: string,
    public description: string,
    public people: number,
    public status: ProjectStatus
  ) {}
}

class ProjectInput {
  formElement: HTMLFormElement;
  titleElement: HTMLInputElement;
  descriptionElement: HTMLInputElement;
  peopleElement: HTMLInputElement;

  constructor() {
    this.formElement = document.querySelector("form") as HTMLFormElement;
    this.titleElement = document.querySelector("#title") as HTMLInputElement;
    this.descriptionElement = document.querySelector(
      "#description"
    ) as HTMLInputElement;
    this.peopleElement = document.querySelector("#people") as HTMLInputElement;
    this.configure();
  }

  private configure() {
    this.formElement.addEventListener("submit", this.submitHandler.bind(this));
  }

  private submitHandler(event: Event) {
    event.preventDefault();
    const userInput = this.gatherUserInput();
    if (Array.isArray(userInput)) {
      const [title, description, people] = userInput;
      this.clearInputs();
      projectState.addProject(title, description, people);
    }
  }

  private clearInputs() {
    this.titleElement.value = "";
    this.descriptionElement.value = "";
    this.peopleElement.value = "";
  }

  private gatherUserInput(): [string, string, number] | void {
    const title = this.titleElement.value;
    const description = this.descriptionElement.value;
    const people = +this.peopleElement.value;

    const titleValidate: IValidate = {
      label: "Title",
      value: title,
      required: true,
    };

    const descriptionValidate: IValidate = {
      label: "Description",
      value: description,
      required: true,
      minLength: 4,
      maxLength: 10,
    };

    const peopleValidate: IValidate = {
      label: "People",
      value: people,
      required: true,
      min: 1,
      max: 10,
    };

    const titleError = validateInput(titleValidate);
    const descriptionError = validateInput(descriptionValidate);
    const peopleError = validateInput(peopleValidate);

    if (!titleError[0] || !descriptionError[0] || !peopleError[0]) {
      const errorMessage = [titleError[1], descriptionError[1], peopleError[1]]
        .filter((error) => error !== "")
        .join("\n");
      alert(errorMessage);
      return;
    }

    return [title, description, people];
  }
}

class ProjectItem implements IDraggable {
  liElement: HTMLLIElement;

  constructor(private project: Project) {
    this.liElement = document.createElement("li");
    this.liElement.setAttribute("draggable", "true");
    this.renderContent();
    this.configure();
  }

  private configure() {
    this.liElement.addEventListener(
      "dragstart",
      this.dragStartHandler.bind(this)
    );
    this.liElement.addEventListener("dragend", this.dragEndHandler.bind(this));
  }

  dragStartHandler(event: DragEvent) {
    event.dataTransfer!.setData("text/plain", this.project.id);
    event.dataTransfer!.effectAllowed = "move";
  }

  dragEndHandler(_event: DragEvent) {
    // Optional: any visual feedback cleanup
  }

  get person() {
    if (this.project.people === 1) {
      return "1 Person";
    }
    return `${this.project.people} Persons`;
  }

  private renderContent() {
    const liData = `<h3>${this.project.title}</h3>
		<div><strong>${this.person} Assigned</strong></div>
		<div>${this.project.description}</div>`;
    this.liElement.innerHTML = liData;
  }

  attachToList(element: HTMLUListElement) {
    element.appendChild(this.liElement);
  }
}

class ProjectList implements IDragTarget {
  assignedProjects: Project[] = [];
  ulElement: HTMLUListElement;

  constructor(private type: "active" | "finished") {
    this.ulElement = document.getElementById(
      `${this.type}-projects-list`
    ) as HTMLUListElement;
    this.configure();
    this.renderProjects();
    projectState.addListener((projects: Project[]) => {
      const relevantProjects = projects.filter((project) => {
        if (this.type === "active") {
          return project.status === ProjectStatus.Active;
        }
        return project.status === ProjectStatus.Finished;
      });
      this.assignedProjects = relevantProjects;
      this.renderProjects();
    });
  }

  private configure() {
    this.ulElement.addEventListener(
      "dragover",
      this.dragOverHandler.bind(this)
    );
    this.ulElement.addEventListener(
      "dragleave",
      this.dragLeaveHandler.bind(this)
    );
    this.ulElement.addEventListener("drop", this.dropHandler.bind(this));
  }

  dragOverHandler(event: DragEvent): void {
    if (event.dataTransfer && event.dataTransfer.types[0] === "text/plain") {
      event.preventDefault();
      this.ulElement.classList.add("droppable");
    }
  }

  dragLeaveHandler(_event: DragEvent): void {
    this.ulElement.classList.remove("droppable");
  }

  dropHandler(event: DragEvent): void {
    const projectId = event.dataTransfer!.getData("text/plain");
    projectState.moveProject(
      projectId,
      this.type === "active" ? ProjectStatus.Active : ProjectStatus.Finished
    );
    this.ulElement.classList.remove("droppable");
  }

  private renderProjects() {
    this.ulElement.innerHTML = "";
    for (const project of this.assignedProjects) {
      const projectItem = new ProjectItem(project);
      projectItem.attachToList(this.ulElement);
    }
  }
}

new ProjectInput();
new ProjectList("active");
new ProjectList("finished");
