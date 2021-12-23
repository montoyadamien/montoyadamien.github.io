let historyLoaded = false;
let historyDisplayOffset = 0;
let historyContainer;
let historyItems = [];

class History{
    constructor(name, location, date, url){
        this.name = name;
        this.location = location;
        this.date = date;
        this.url = url;
    }
}

(function(){
    historyDisplayOffset = historyAnchor.offsetTop;
    historyContainer = document.getElementById('history-container');

    historyItems.push(new History('Emploi saisonnier, Juillet', 'Société Générale Fréjus', 2016, null));
    historyItems.push(new History('Emploi saisonnier, Juillet', 'Société Générale Carpentras', 2017, null));
    historyItems.push(new History('Stage développeur fullstack', 'Da Nang University of Technology - Vietnam', 2018, null));
    historyItems.push(new History('Diplômé DUT Informatique', 'IUT Nice Côte d\'Azur', '2016 à 2018', '/public/assets/media/dut_info.pdf'));
    historyItems.push(new History('Stage développeur fullstack', 'Junior-Entreprise Polytech Nice Conseil', 2019, 'https://polytechniceconseil.com/'));
    historyItems.push(new History('Alternant développeur fullstack', 'Air France - Sophia Antipolis', '2020 à 2021', null));
    historyItems.push(new History('Diplômé Master Informatique', 'Polytech Nice-Sophia', '2020 à 2021', '/public/assets/media/polytech_info.pdf'));
    historyItems.push(new History('Diplômé Ingénieur Informatique', 'Polytech Nice-Sophia', '2018 à 2021', '/public/assets/media/polytech_info.pdf'));


    buildHistory();
})();

function buildHistoryItem(historyItem){
    let item = document.createElement('div');
    item.classList.add('history-item');
        let subContainer = document.createElement('div');
        subContainer.classList.add('history-item-sub-container');
            let itemRound = document.createElement('div');
            itemRound.classList.add('history-item-round');
            itemRound.appendChild(document.createTextNode(historyItem.date));
        subContainer.appendChild(itemRound);
            let textContainer = document.createElement('div');
            textContainer.classList.add('history-item-container-text');
                let title;
                if(historyItem.url === null){
                    title = document.createElement('h3');
                }else{
                    title = document.createElement('a');
                    title.target = '_blank';
                    title.classList.add('history-item-title-a');
                    title.href = historyItem.url;
                }
                title.classList.add('history-item-title');
                title.appendChild(document.createTextNode(historyItem.name));
            textContainer.appendChild(title);
                let text = document.createElement('div');
                text.classList.add('history-item-text');
                text.appendChild(document.createTextNode(historyItem.location));
            textContainer.appendChild(text);
        subContainer.appendChild(textContainer);
            let historyBar = document.createElement('div');
            historyBar.classList.add('history-bar');
        subContainer.appendChild(historyBar);
        item.appendChild(subContainer);
    historyContainer.appendChild(item);
}

function buildHistory(){
    for(let i = historyItems.length-1; i>=0; i--){
        buildHistoryItem(historyItems[i]);
    }

    historyScroll();
    window.addEventListener('scroll', function(){
        historyScroll();
    });
}

function historyScroll(){
    historyDisplayOffset = historyAnchor.offsetTop;
    if(window.pageYOffset >= (historyDisplayOffset-(window.innerHeight/2)) && historyLoaded === false) {
        historyLoaded = true;
        displayOneAfterOther(document.querySelectorAll('.history-item-round'), 'scale 0.4s linear forwards', 0.6, false, false);
        displayOneAfterOther(document.querySelectorAll('.history-bar'), 'opacity 0.2s linear forwards', 0.6, true, 0.4);
        displayOneAfterOther(document.querySelectorAll('.history-item-title'), 'opacity 0.4s linear forwards', 0.6, true, 0.4);
        displayOneAfterOther(document.querySelectorAll('.history-item-text'), 'opacity 0.4s linear forwards', 0.6, true, 0.8);
    }
}
