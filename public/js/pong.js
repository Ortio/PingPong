ping.onclick = function (e) {
    e.preventDefault();
    var data = fetch("/",
        {
            method: "POST",
            headers: {"content-type": "application/x-www-form-urlencoded"}
        })

        .then(response => {
            if (response.status !== 200) {
                return Promise.reject();
            }
            return response.json()
        })
        .then(i => {
            addText(i);
        })
        .catch(() => console.log('error'))
};

/**
 * @param text
 */
function addText(text) {
    var block = document.getElementById('textResponse');
    block.innerText = text;
}
