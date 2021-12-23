let certificatesLoaded = false;
let certificatesDisplayOffset = 0;

(function(){
    certificatesDisplayOffset = certificatesAnchor.offsetTop;

    certificateScroll();
    window.addEventListener("scroll", function(){
        certificateScroll();
    });
})();

function certificateScroll(){
    certificatesDisplayOffset = certificatesAnchor.offsetTop;
    if(window.pageYOffset >= (certificatesDisplayOffset-(window.innerHeight/2)) && certificatesLoaded === false) {
        certificatesLoaded = true;
        displayOneAfterOther(document.querySelectorAll(".certificate-item"), "opacity 0.5s linear forwards", 0.5, true, 0.3);
    }
}
