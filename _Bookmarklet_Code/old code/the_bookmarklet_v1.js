javascript: (function() {
    var card = document.querySelectorAll(".card__details");
    var big_1 = [];
    var big_2 = [];
    for (i = 0; i < card.length; i++) {
        var title = (card[i].children[0].innerHTML.trim());
        var tutor = (card[i].children[1].childNodes[0].textContent.trim());
        var link = (card[i].parentElement.href);
        var image = (card[i].parentElement.previousElementSibling.children[0].children[0].src.trim());
        var small = [];
        small.push(title);
        small.push(tutor);
        small.push(link);
        small.push(image);
        if (i < 16) {
            big_1.push(small);
        } else {
            big_2.push(small);
        }
    }
    var x = JSON.stringify(big_1);
    console.log(x.length);
    window.open('http://localhost/mypages/bookmark_scraper/new_scraper_json_dom.php?name=' + encodeURIComponent(x) + '');
    var y = JSON.stringify(big_2);
    console.log(y.length);
    window.open('http://localhost/mypages/bookmark_scraper/new_scraper_json_dom.php?name=' + encodeURIComponent(y) + '');
})()