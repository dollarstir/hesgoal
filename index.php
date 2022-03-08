
<?php
//Load the HTML page
// $html = file_get_contents('http://www.hesgoal.com/news/84882/Kolos_Kovalivka_vs_Rukh_Lviv.html');
// //Parse it. Here we use loadHTML as a static method
// //to parse the HTML and create the DOM object in one go.
// @$dom = DOMDocument::loadHTML($html);

// //Init the XPath object
// $xpath = new DOMXpath($dom);

// //Query the DOM
// $links = $xpath->query('//li[contains(@class, "foo")]//a[@class = "bar"]');

// //Display the results as in the previous example
// foreach ($links as $link) {
//     echo $link->getAttribute('href'), '<br>';
// }



//Load the HTML page
$html = file_get_contents('http://www.hesgoal.com/news/84882/Kolos_Kovalivka_vs_Rukh_Lviv.html');
//Create a new DOM document
$dom = new DOMDocument;

//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
@$dom->loadHTML($html);

//Get all links. You could also use any other tag name here,
//like 'img' or 'table', to extract other tags.
$links = $dom->getElementsByTagName('iframe');

//Iterate over the extracted links and display their URLs
foreach ($links as $link) {
    //Extract and show the "href" attribute. 
    $dd  = $link->getAttribute('src');
    $dd1 =  preg_replace('/\/\//', 'http://', $dd);
    $dd3 = preg_replace('/ /', '%20', $dd1);
    echo $dd3;
}

?>