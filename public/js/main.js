window.addEventListener('load', function () {

    //:::::::::::::::::::::::::::::::::::::::::::::::::://

    const AJAX = {
        get: function (url, callback) {
            let xhr = new XMLHttpRequest();
            xhr.addEventListener('readystatechange', function () {
                if (this.readyState === 4 && this.status === 200){
                    callback(this.responseText);
                }
            });
            xhr.open(
                'GET',
                url,
                true
            );
            xhr.send();
        },
        post: function (url, obj, callback) {
            let xhr = new XMLHttpRequest();
            xhr.addEventListener('readystatechange', function () {
                if (this.readyState === 4 && this.status === 200){
                    callback(this.responseText);
                }
            });
            xhr.open(
                'POST',
                url,
                true
            );
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            let data = '';
            Object.entries(obj).forEach(function (arr) {
                data += arr[0] + '=' + arr[1];
                data += '&';
            });
            xhr.send(data.replace(/&$/ , ''));
        }
    };

    function serialize(form){
        let fd = new FormData(form);
        let data = Object.create({});
        for (let input of fd){
            Object.defineProperty(data, input[0], {
                enumerable: true,
                value: input[1],
                writable: true
            })
        }
        return data;
    }

    //:::::::::::::::::::::::::::::::::::::::::::::::::://
    //LOGIC FOR SELECT OPTION
    let select = document.querySelector('.select');
    let arrow = document.querySelector('.arrow');
    let label = document.querySelector('.label_selected');
    let options = document.querySelector("#select");
    let items = document.querySelectorAll('.option_item');

    function toggleUnroll(e){
        options.classList.toggle('show_options');
        arrow.classList.toggle('rotate_arrow');
    }

    function makeSelected(e){
        label.innerText = this.innerText;
        label.dataset.value = this.dataset.id;
    }

    if (select !== null) {
        select.addEventListener('click', toggleUnroll);
    }
    items.forEach(function (item) {
        item.addEventListener('click', makeSelected)
    });

    //:::::::::::::::::::::::::::::::::::::::::::::::::://
    //LOGIC FOR ADD BUTTONS
    let content = document.querySelector('.content');
    function loadContent(){
        let links = this.href.split('#').pop().split('-');
        let c = links[0];
        let m= links[1];
        AJAX.get(
            c+'/'+m,
            function (data) {
                console.log(data)
            }
        )
    }
    let loaders = document.querySelectorAll('.load_content');
    loaders.forEach(function (loader) {
        loader.addEventListener('click', loadContent);
    });

    //:::::::::::::::::::::::::::::::::::::::::::::::::://
    //ADD APARTMENT

    //Loding data specified by SELECT
    let city = document.querySelector('#city');
    let zone = document.querySelector('#district');
    let borough = document.querySelector('#borough');

    //Loding Zones
    function loadZones(){
      zone.innerHTML = '';
      borough.innerHTML = `<option value="0">Quartier</option>`;
      let index = this.selectedIndex;
      let city = this.children.item(index).value;
      AJAX.get(
        '/district/city/'+city,
        function (data) {
          zone.innerHTML = `<option value="0">Zone</option>`;
          let zones = JSON.parse(data).zones;
          zones.forEach(function(z){
            let option = `<option value="${z.id}">${z.district}</option>`;
            zone.innerHTML += option;
          })
        }
      )
    }

    city.addEventListener('change', loadZones);

    //Loading Borough
    function loadBoroughs(){
      borough.innerHTML = '';
      let index = this.selectedIndex;
      let id = this.children.item(index).value;
      AJAX.get(
        '/district/zone/'+id,
        function (data) {
          borough.innerHTML = `<option value="0">Quartier</option>`;
          let boroughs = JSON.parse(data).borough;
          let str = boroughs[0].borough
          let arr = str.split(',');
          arr.forEach(function(s, i){
            let option = `<option value="${i+1}">${s}</option>`;
            borough.innerHTML += option;
          })
        }
      )
    }

    zone.addEventListener('change', loadBoroughs);
    /////////////////////////////////////////////////////////////////////
    let form = document.forms.namedItem('new_appart');
    let cancel = document.querySelector('.reset');
    function resetForm(){
      let messages = document.querySelectorAll('p.fail');
      let labels = document.querySelectorAll('label');
      messages.forEach(function(message) {
        message.remove();
      })
      labels.forEach(function(label) {
        label.textContent = 'Parcourir';
      })
      form.reset();
    }
    cancel.addEventListener('click', resetForm)

    //Preview Images to be uploaded
    let browsers = document.querySelectorAll(".browse");
    browsers.forEach(function (browse) {
        browse.addEventListener('change', function (e) {
            let next = this.nextElementSibling;
            let label = this.previousElementSibling;
            let length = this.files.length;
            let unit = 'images';
            if (length <= 1) {
              unit = 'image'
            }
            label.textContent = `${length} ${unit} `;
        });
    })

    //:::::::::::::::::::::::::::::::::::::::::::::::::://
    //LOAD APARTMENT DETAILS

    let btnDetails = document.querySelectorAll('.actions_menu_button');
    let popup = document.querySelector('#blank .popup__content');

    function loadApartDetails(e){
        popup.innerHTML = '<div class="popup__loading"></div>';
        //e.preventDefault();
        let id = this.dataset.id;
        AJAX.get(
            `/appartment/get/${id}`,
            function (data) {
                popup.innerHTML = data;
            }
        )
    }
    btnDetails.forEach(function (btn) {
        btn.addEventListener('click', loadApartDetails)
    });



});
