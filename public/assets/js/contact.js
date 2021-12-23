let contactLoaded = false;
let contactDisplayOffset = 0;

(function(){
    contactDisplayOffset = contactAnchor.offsetTop;

    contactScroll();
    window.addEventListener('scroll', function(){
        contactScroll();
    });
})();

function contactScroll(){
    contactDisplayOffset = contactAnchor.offsetTop;
    if(window.pageYOffset >= (contactDisplayOffset-(window.innerHeight/2)) && contactLoaded === false) {
        contactLoaded = true;
        displayOneAfterOther(document.querySelectorAll('.contact-item'), 'opacity 0.5s linear forwards', 0.5, true, 0.3);
    }
}
