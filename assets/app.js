/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


/* ANIMATION DE LA BANNIERE */

const bougeC = function bougeCode () {
	document.getElementById('banniere').classList.add('code');
};
bougeC();

const upC = function upCode () {
	document.getElementById('banniere').classList.remove('code');
};
upC(); 

const bougeD = function bougeDesign () {
	document.getElementById('banniere').classList.add('design');
};
bougeD();

const upD = function upDesign () {
	document.getElementById('banniere').classList.remove('design');
};
upD();
