function thumbsup()
{   
    var id = $('#articleid').val();
    $.ajax({
        type:'post',
        url:'myfunction.php?act=dianzan',
        dataType:'json',
        data:{id:id},
        success:function (msg) {
            if(msg == 'success') {
                alert('点赞成功');
            }else {
                alert('您已经点赞过了');
            }
        },
        error:function () {

        }
    });
}