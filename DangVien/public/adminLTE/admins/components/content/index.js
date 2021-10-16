function actionDelete(event){
  event.preventDefault();
  let urlRequest = $(this).data('url');
  let that = $(this);
  Swal.fire({
    title: 'Bạn có chắc muốn xóa?',
    text: "Bạn sẽ không thể hoàn nguyên điều này!",
    icon: 'Cảnh báo',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'Get',
        url: urlRequest,
        success: function(data){
          if(data.code == 200){
            that.parent().parent().remove();
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        },
        error:function (){}
      })

    }
  })
}

$(function(){
  $(document).on('click','.action_delete',actionDelete);
});

