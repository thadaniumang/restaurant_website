const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('#links');

hamburger.addEventListener('click', e => {
    if(navLinks.classList.contains('hidden')){
        navLinks.classList.remove('hidden');
    }
    else{
        navLinks.classList.add('hidden');
    }
})