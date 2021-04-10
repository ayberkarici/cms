$(document).ready(function () {


    $(".sortable").sortable();

    $(".content-container, .image_list_container").on("click", ".remove-btn", function(){

        var $data_url = $(this).data("url");

        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText : "Hayır"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $data_url;
            }
        })
        

    })

    $(".content-container, .image_list_container").on("change", ".isActive", function(){

        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");
        var $data_id = $(this).data("id");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {

            });

            $(".sortable").sortable();

            iziToast.success({
                title: 'İşlem Başarılı',
                message: $data_id+' No\'lu kaydın durumu değiştirildi',
                position:'bottomRight'
            });

        }

    })

    $(".image_list_container").on("change", ".isCover" , function(){

        const $data = $(this).prop("checked");
        const $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined"){

            $.post($data_url, { data : $data}, function (response) {

                $(".image_list_container").html(response);

                $('[data-switchery]').each(function(){
                    const $this = $(this),
                        color = $this.attr('data-color') || '#188ae2',
                        jackColor = $this.attr('data-jackColor') || '#ffffff',
                        size = $this.attr('data-size') || 'default'
    
                    new Switchery(this, {
                        color: color,
                        size: size,
                        jackColor: jackColor
                    });
                });

                $(".sortable").sortable();

                iziToast.success({
                    title: 'İşlem Başarılı',
                    message: 'Kapak fotoğrafı değiştirildi',
                    position:'bottomRight'
                });

            });


        }

    })

    $(".content-container, .image_list_container").on("sortupdate", ".sortable" , function(event, ui){

        const $data = $(this).sortable("serialize");
        const $data_url = $(this).data("url");

        $.post($data_url, {data : $data}, function(response){
            iziToast.success({
                title: 'İşlem Başarılı',
                message: 'Sıralama değiştirildi',
                position:'bottomRight'
            });
        })
    })

    const uploadSection = Dropzone.forElement("#dropzone");

    uploadSection.on("complete", function(file){

        const $data_url = $("#dropzone").data("url");

        $.post($data_url, {}, function(response){

            $(".image_list_container").html(response);
            
            $('[data-switchery]').each(function(){
				let $this = $(this),
					color = $this.attr('data-color') || '#188ae2',
					jackColor = $this.attr('data-jackColor') || '#ffffff',
					size = $this.attr('data-size') || 'default'

				new Switchery(this, {
					color: color,
					size: size,
					jackColor: jackColor
				});
			});

            $(".sortable").sortable();

            iziToast.info({
                title: 'Bilgi!',
                message: 'Yeni bir dosya eklendi',
                position:'bottomRight'
            });
            
        });

    })

})