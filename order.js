window.addEventListener("load", initSite())

async function initSite() {
    showOrders()
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

async function showOrders() {
    const getOrder = await makeReq("./server/orderReciever.php", "GET")
    
    for(i = 0; i < getOrder.length; i++) {
     
        console.log(getOrder[i].orderItems)

        
    }
    

}