let historyLoaded = false;
let historyDisplayOffset = 0;

(function(){
    historyDisplayOffset = historyAnchor.offsetTop;

    historyScroll();
    window.addEventListener("scroll", function(){
        historyScroll();
    });
})();

function historyScroll(){
    historyDisplayOffset = historyAnchor.offsetTop;
    if(window.pageYOffset >= (historyDisplayOffset-(window.innerHeight/2)) && historyLoaded === false) {
        historyLoaded = true;
        displayOneAfterOther(document.querySelectorAll(".history-item-round"), "scale 0.4s linear forwards", 0.6, false, false);
        displayOneAfterOther(document.querySelectorAll(".history-bar"), "opacity 0.2s linear forwards", 0.6, true, 0.4);
        displayOneAfterOther(document.querySelectorAll(".history-item-title"), "opacity 0.4s linear forwards", 0.6, true, 0.4);
        displayOneAfterOther(document.querySelectorAll(".history-item-text"), "opacity 0.4s linear forwards", 0.6, true, 0.8);
    }
}
