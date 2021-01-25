window.addEventListener("load", initSite())


async function initSite() {
    await viewProducts()

}




async function makeReq(path, method, body) {
    try {
        let response = await fetch(path, {
            method,
            body
        })

        return response.json()
        
    }
     catch(err) {
          console.error("Failed fetch", err)
      } 
}

async function viewProducts() {
    const response = await makeReq("./produktReciever.php", "GET")
    
    let prodCont = document.getElementById("produktBox")

    console.log(response)

    for(i = 0; i < response.length; i++){
        console.log("svar: ", response[i])
       
        let prodCard = document.createElement("div")
        prodCard.className = "prodCard"
        prodCont.appendChild(prodCard) 
        
        
        printProd(response, prodCard)
        addToCartBtn(prodCard, "lägg till i kundvagn")
    }

}




function printProd(from, parent) {
    prodBox = document.createElement("div")  
    let name = document.createElement("h2")
    let price = document.createElement("p")
    name.innerText = from[i].name
    price.innerText = from[i].price
    parent.appendChild(name)
    parent.appendChild(price)

}


function addToCartBtn(parent, text) {
    let addBtn = document.createElement("button")
    addBtn.innerText = text
    parent.appendChild(addBtn)
}