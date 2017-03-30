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
                location.reload();
            }else {
                alert('您已经点赞过了');
            }
        },
        error:function () {

        }
    });
}

function dingtop(e)
{   
    
    var pid = $(e).attr('aid');
    $.ajax({
        type:'post',
        url:'myfunction.php?act=dingtop',
        dataType:'json',
        data:{pid:pid},
        success:function (msg) {
            if(msg == 'success') {
                location.reload();
            }else {
                alert('您已经顶过了');
            }
        },
        error:function () {

        }
    });
}