$(function () {
    const szakdoga = new Szakdoga()
  
    myAjax('/szakdoga', szakdogaLista)
  
    function szakdogaLista(szakdoga) {
      const szuloElem = $('.szakdogas')
      const sablonElem = $('.szakdoga')
  
      termekek.forEach(function (elem) {
        let node = sablonElem.clone().appendTo(szuloElem)
        const obj = new TermekAruhaz(node, elem)
      })
      sablonElem.remove() //sablonelem eltávolítása
  
      $(window).on('szadogatablazatba', (event) => {
        //itt hívjuk meg a kosarat és belepakoljuk a kosár tömbbe az
        //aktuális termék adatait
       szakdoga.set(event.detail)
      })
    }
  })
  