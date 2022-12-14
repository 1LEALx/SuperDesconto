const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// Mostrar senha cadastro
var input = document.querySelector('#input input');
var img = document.querySelector('#input img');

img.addEventListener('click', function () {
  input.type = input.type == 'text' ? 'password' : 'text';
});

var currentImgIndex = 1;
var ImgSrcArray = [ 
'imagens/eye-slash-solid.svg',
'imagens/eye-solid.svg'
];

function trocar() {
	if (currentImgIndex == ImgSrcArray.length){
		currentImgIndex = 0;
	}
	document.getElementById("eye").src=ImgSrcArray[currentImgIndex];
		currentImgIndex++;
}

// Mostrar senha login
var input2 = document.querySelector('#input-login input');
var img2 = document.querySelector('#input-login img');

img2.addEventListener('click', function () {
  input2.type = input2.type == 'text' ? 'password' : 'text';
});

var currentImgIndex2 = 1;
var ImgSrcArray2 = [ 
'imagens/eye-slash-solid.svg',
'imagens/eye-solid.svg'
];

function trocarLogin() {
	if (currentImgIndex2 == ImgSrcArray2.length){
		currentImgIndex2 = 0;
	}
	document.getElementById("eye-login").src=ImgSrcArray2[currentImgIndex2];
		currentImgIndex2++;
}
