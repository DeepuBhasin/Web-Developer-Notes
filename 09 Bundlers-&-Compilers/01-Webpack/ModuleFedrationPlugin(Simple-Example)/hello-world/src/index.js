import HelloWorldButton from './components/hello-world-button/hello-world-button'
import Heading from "./components/heading/heading"

const helloWorldButton = new HelloWorldButton();
helloWorldButton.render();

const heading = new Heading();
heading.render()

if (process.env.NODE_ENV === 'production') {
    console.log('Production Mode');
} else if (process.env.NODE_ENV === 'development') {
    console.log('Development Mode');
} else if (process.env.NODE_ENV === 'none') {
    console.log('None Mode');
} else {
    console.log('No ode');
}