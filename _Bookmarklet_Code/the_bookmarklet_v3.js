var card = document.querySelectorAll(".card");
    var big_1 = [];
    var big_2 = [];
for (i = 0; i < card.length; i++) {
     var image = card[i].children[1].children[0];

    var name = image.children[0].innerHTML.trim();
    var tutor = image.children[1].textContent.trim();
    var url = card[i].children[1].href.trim();
    var pic = card[i].children[0].children[0].children[0].src.trim();

    var tutor = tutor.split(',');

    tutor = tutor[0].trim();

        var small = [];
        small.push(name);
        small.push(tutor);
        small.push(url);
        small.push(pic);
        if (i < 16) {
            big_1.push(small);
        } else {
            big_2.push(small);
        }
    }

    
    var x = JSON.stringify(big_1);
  
   window.open('http://127.0.0.1/mypages/udemy_app_details_only/_Bookmarklet_Code/new_scraper_json_dom.php?name=' + encodeURIComponent(x) + '');
    
	var y = JSON.stringify(big_2);
 
    window.open('http://127.0.0.1/mypages/udemy_app_details_only/_Bookmarklet_Code/new_scraper_json_dom.php?name=' + encodeURIComponent(y) + '');

	console.log('done');
