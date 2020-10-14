<script>
    $(() => {
        const init = (e) => {
            e.preventDefault();
            let that = $(e.currentTarget);
            that.hide();
            that.closest('td').find('i.fa-spinner').show();
            return that;
        }
        const alertServer = () => {
            that.show();
            that.closest('td').find('i.fa-spinner').hide();
            $('.alert-warning').removeClass('d-none').addClass('show');
        }
        $('.alert-warning button').click(() => {
            $('.alert-warning').addClass('d-none').removeClass('show');
        });
        $('.btn-danger').click((e) => {
            that = init(e);
            $.ajax({
                method: 'delete',
                url: that.attr('href'),
            })
            .done(() => {
                document.location.reload(true);
            })
            .fail(() => {
                alertServer();
            });
        });
        $('.btn-success').click((e) => {
            that = init(e);
            $.post(that.attr('href'))
            .done((data) => {
                that.show();
                that.closest('td').find('i.fa-spinner').hide();
                that.closest('tr').find('td.date-id').text(data.limit);
                if(data.ok) that.closest('tr').addClass('table-success');
            })
            .fail(() => {
                alertServer();
            });
        });
    })
</script>