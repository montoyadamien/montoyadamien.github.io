let certificatesLoaded = false;
let certificatesDisplayOffset = 0;

const certificateScroll = () => {
    certificatesDisplayOffset = certificatesAnchor.offsetTop;
    if (window.scrollY >= (certificatesDisplayOffset - (window.innerHeight / 2)) && certificatesLoaded === false) {
        certificatesLoaded = true;
        displayOneAfterOther(document.querySelectorAll('.certificate-item'), 'opacity 0.5s linear forwards', 0.2, true, 0.3);
    }
}

(() => {
    certificatesDisplayOffset = certificatesAnchor.offsetTop;

    certificateScroll();
    window.addEventListener('scroll', function () {
        certificateScroll();
    });
})();