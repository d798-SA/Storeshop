window.onscroll = function(){showPosition()};
function showPosition(){
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;

    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;

    var scrolled = (winScroll / height) * 100;

    document.getElementById('progress-bar').style.width = scrolled + "%";
};

// const list_main_item = document.querySelectorAll(".list-main-item");

// list_main_item[0].checked = true;

// list_main_item.forEach((e) =>{
//     e.addEventListener('click', (event)=>{
//         list_main_item.forEach((e)=>{
//             e.checked = false;
//             e.parentElement.classList.remove("active");
//         })

//         event.target.checked = true;
//         e.parentElement.classList.add("active")
//     })
// });

// class Custom


class cardShop extends HTMLElement {
   
    render() {
        // let shadow = this.attachShadow({mode:"open"});

        let avatar = this.getAttribute('avatar');
        let sellername = this.getAttribute('sellername');
        let title = this.getAttribute('title');
        let description = this.getAttribute('description');
        let price = this.getAttribute('price');

        
        this.innerHTML = `
        
      
        
        <div class="card">
        <div class="card-img">
            <img src="${avatar}"  loading="lazy" alt="">
        </div>
        <div class="card-publisher">
            <span>اسم البائع</span>
            <hr>
            <span>${sellername}</span>
        </div>
        <h1 class="card-title">${title}</h1>
        <div class="card-description">
            <span>الوصف</span>
            <hr>
        <p>
            ${description}
        </p>
    
        </div>
        <hr>
        <div class="card-price">
            <span>السعر بالريال </span>
           <hr>
            <p>  ${price}</p>
        
        </div>
    
        <div class="card-info">
            <div class="sub-info">
            <i class="fad fa-cart-arrow-down"></i> <br>
                    إضافة
            </div>
            <div id="btn-info" class="sub-info">
            <i class="far fa-calendar-star"></i> <br>
                    المفضله
            </div>
           
        </div>
    </div>
        `
    }

    constructor(){
        super();
        this.render();
    }
   
//     connectedCallback(){
  
//         this.render();
//    }

   static get observedAttributes() {
    return ['avatar' , 'sellername' , 'price' , 'title' , 'description'];
}


attributeChangedCallback(name, oldvalue, newvalue) {
    this.render();

}
}





// if(message.length


// ShadowRoot


window.customElements.define('card-shop' , cardShop);