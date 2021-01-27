window.addEventListener("load", initSite())

async function initSite() {
    await viewProducts()
    placeOrderBtn()
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
       
        let prodCard = document.createElement("div")
        prodCard.className = "prodCard"
        prodCont.appendChild(prodCard)       
        
        printProd(response, prodCard)
        cartBtn(prodCard, "lägg till i kundvagn", response[i])
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

async function cartBtn(parent, text, product) {
    let addBtn = document.createElement("button")
    addBtn.innerText = text
    parent.appendChild(addBtn)
     
    addBtn.addEventListener("click", async () => {    
        addToCart(product)            
    }) 
     
}

async function addToCart(product) {
    let productList = []
   
    if(localStorage.getItem("cart")) {
        productList = JSON.parse(localStorage.getItem("cart"))  
    }
    else {
        localStorage.setItem("cart", JSON.stringify(productList))
    }
   
    productList.push(product)
    localStorage.setItem("cart", JSON.stringify(productList))

}

async function placeOrderBtn() {
    let orderBtn = document.getElementById("placeOrderBtn")

    orderBtn.addEventListener("click", () => {
        placeOrder()    
    })
    
}


async function placeOrder() {
    
    let cart = localStorage.getItem("cart")
    
    
    
    /* localStorage.getItem("cart") */
    
    let date = new Date().toISOString().slice(0, 10) 
    
    
    let body = new FormData()
    body.set("cart", cart)
    body.set("date", date) 
    
    const rendReq = await makeReq("./orderReciever.php", "POST", body)

    console.log(rendReq)

    console.log(rendReq.products[0].name)
 
    

}


