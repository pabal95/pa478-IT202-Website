/* -- #Pabal Ahmed | IT202-004 | 4/16/2026 */
function getRealTime() {
    var request = new XMLHttpRequest();
    request.open("GET", "realtime.php", true);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var xmldoc = request.responseXML;

            // Helper function to format prices with $ and commas
            function formatVal(tagName) {
                var node = xmldoc.getElementsByTagName(tagName)[0];
                var val = node ? node.childNodes[0].nodeValue : "0";
                return "$" + parseFloat(val).toLocaleString(undefined, {minimumFractionDigits: 2});
            }

            // Update Laptop Type and Laptop counts
            document.getElementById("laptoptypecount").innerHTML = 
                xmldoc.getElementsByTagName("laptoptypecount")[0].childNodes[0].nodeValue;
            
            document.getElementById("laptopcount").innerHTML = 
                xmldoc.getElementsByTagName("laptopcount")[0].childNodes[0].nodeValue;

            // Fix: Correctly mapping the price IDs
            document.getElementById("sellpricetotal").innerHTML = formatVal("selltotal");
            document.getElementById("buypricetotal").innerHTML = formatVal("buytotal");
        }
    };
    request.send();
}