import Heading from "./components/heading/heading";
import Work from "./components/work-image/workImage";

const work = new Work();
work.render();

const heading = new Heading();
heading.render();

// use dynamicimport because remote bundle are loaded asynchronously
import('HelloWorldApp/HelloWorldButton').then(HelloWorldModule => {
    const HelloWorldButton = HelloWorldModule.default;
    const helloWorldButton = new HelloWorldButton();
    helloWorldButton.render();
});

