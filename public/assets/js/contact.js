let contactLoaded = false;
let contactDisplayOffset = 0;

const contactScroll = () => {
    contactDisplayOffset = contactAnchor.offsetTop;
    if (window.scrollY >= (contactDisplayOffset - (window.innerHeight / 2)) && contactLoaded === false) {
        contactLoaded = true;
        displayOneAfterOther(document.querySelectorAll('.contact-item'), 'opacity 0.5s linear forwards', 0.2, true, 0.3);
    }
}

(() => {
    contactDisplayOffset = contactAnchor.offsetTop;

    contactScroll();
    window.addEventListener('scroll', function () {
        contactScroll();
    });
})();