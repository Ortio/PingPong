ping.onclick = function (e) {
    e.preventDefault();
    fetch("/api/ping",
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
    let block = document.getElementById('textResponse');
    block.innerText = text;
}
