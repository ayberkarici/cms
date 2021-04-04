$(document).ready(function () {

    $(".sortable").sortable();

    $(".remove-btn").click(function () {
        const $data_url = $(this).data("url");
        const $data_itemName = $(this).data("name");

        Swal.fire({
            title: 'Emin misiniz?',
            text: $data_itemName +" adlı ürünü silmek üzeresiniz!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, sil!',
            cancelButtonText: 'Hayır'
          }).then((result) => {
            if (result.isConfirmed) {

                window.location.href = $data_url;
                /*Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )*/
            }
          })
    });
      
    $(".isActive").change(function () {
        const $data = $(this).prop("checked");
        const $data_url = $(this).data("url");

        if(typeof $data !== undefined && typeof $data_url !== undefined) {
            $.post($data_url, {data : $data}, function () {});
        }
    })

    $(".sortable").on("sortupdate", function (event, ui) {
      const $data   = $(this).sortable("serialize");
      const $data_url = $(this).data("url");

      $.post($data_url, {data : $data}, function (response) {});

    })

})