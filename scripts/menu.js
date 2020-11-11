document.addEventListener('DOMContentLoaded', () => {
    const mainMenu = document.querySelector('main');
    mainMenu.innerHTML = '<div style="margin: 10px auto"><img src="../images/loader/loader.gif" width="75" height="75"></img></div>'

    const menuUI = data => {
        mainMenu.innerHTML = "";
        for(let i in data) {
            mainMenu.innerHTML += `<div class="tilesurround col-md-4 col-sm-6 col-12">
                                        <div class="card">
                                            <div class="card-image">
                                                <img src="../images/menu/${data[i].img}.jpg" alt="${data[i].img}">
                                            </div>
                                            <div class="card-body">
                                                <div class="card-head">
                                                    <h3>${data[i].name}</h3>
                                                </div>
                                                <div class="card-price">
                                                    <p>Price: <span>&#8377;${data[i].price}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`

        }
    }

    fetch('../json/menuitems.json').then(response => {
        return response.json();
    }).then(data => {
        menuUI(data);
    }).catch(error => {
        console.log(`${error}. An error occurred!`);
    })
})

            