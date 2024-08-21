const courses = [
  { id: 1, name: "course1" },
  { id: 2, name: "course2" },
  { id: 3, name: "course3" },
];

const validateCourseName = (req, res, next) => {
  if (!req.body.name || req.body.name.length < 3) {
    return res.status(400).send({
      status: "fail",
      message:
        "Course name is required and should be at least 3 characters long",
    });
  }
  next();
};

const findCourseMiddleware = (req, res, next) => {
  const course = courses.find((c) => c.id === parseInt(req.params.id));
  if (!course) {
    return res.status(404).send({
      status: "fail",
      message: "Course not found",
    });
  }
  req.course = course; // Attach the course to the request object
  next();
};

const getRequestMiddleware = (req, res) => {
  return res.status(200).send({ status: "success", data: courses });
};

const getSingleRequestMiddleware = (req, res) => {
  const course = courses.find((c) => c.id === parseInt(req.params.id));
  if (!course) {
    return res.status(404).send({
      status: "fail",
      message: "Course not found",
    });
  }
  return res.status(200).send({ status: "success", data: course });
};

const postRequestMiddleware = (req, res) => {
  const newCourse = {
    id: courses.length + 1,
    name: req.body.name,
  };

  courses.push(newCourse);
  return res.status(201).send({
    status: "success",
    message: "Course created successfully",
    data: newCourse,
  });
};

const patchRequestMiddleware = (req, res) => {
  req.course.name = req.body.name;
  return res.status(200).send({
    status: "success",
    message: "Course updated successfully",
    data: req.course,
  });
};

const deleteRequestMiddleware = (req, res) => {
  const index = courses.indexOf(req.course);
  courses.splice(index, 1);
  return res.status(200).send({
    status: "success",
    message: "Course deleted successfully",
    data: req.course,
  });
};

module.exports = {
  validateCourseName,
  getRequestMiddleware,
  getSingleRequestMiddleware,
  findCourseMiddleware,
  postRequestMiddleware,
  patchRequestMiddleware,
  deleteRequestMiddleware,
};
