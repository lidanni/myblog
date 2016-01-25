require(['jquery','nav','footer'], function() {
    $(function () {
        /**************************  添加评论  ***************************/
        $('.submit').on('click', function () {
            var blog_id = $(this).data('id'),
                $comment = $('.area');

            $.get('welcome/comment', {
                blog_id: blog_id,
                comment: $comment.val()
            }, function (res) {
                if (res == 'success') {
                    alert('success!');
                    location.href = 'welcome/blog?blog_id=' + blog_id
                    $comment.css({
                        border: '1px solid #E6E6E6'
                    });
                } else {
                    $comment.css({
                        border: '1px solid red'
                    });
                }
            });
        });
        /**************************  添加评论  ***************************/
    });
});