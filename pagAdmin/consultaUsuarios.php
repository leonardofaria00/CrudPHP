<?php
session_start();
include_once '../Controller/usuarioControler.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="../images/gallery/icone.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="ISO-8859-1" />
        <title>Consulta usuarios</title>
        <meta name="description" content="Static &amp; Dynamic Tables" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!-- page specific plugin styles -->
        <!-- text fonts -->
        <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
        <!-- ace styles -->
        <link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->
        <!-- inline styles related to this page -->
        <!-- ace settings handler -->
        <script src="../assets/js/ace-extra.min.js"></script>
        <!-- basic scripts -->
        <!--[if !IE]> -->
        <script src="../assets/js/jquery-1.11.3.min.js"></script>
        <!-- <![endif]-->
        <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    </head>
    <body class="no-skin">
        <div class="main-container ace-save-state" id="main-container">

            <?php include_once '../template/menu.php'; ?>     

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="header smaller lighter blue container"><i class="ace-icon fa fa-folder-open-o bigger-200"></i>&nbsp;&nbsp;&nbsp; Consultar Usu�rios</h3>
                            <div class="container">
                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">
                                                <i class="ace-icon fa fa-code-fork bigger-110 hidden-480"></i> 
                                                Cod. Atividade
                                            </th>
                                            <th class="center">
                                                Nome
                                            </th>
                                            <th class="center">
                                                <i class="ace-icon fa fa-yelp bigger-110 hidden-480"></i>     
                                                Telefone
                                            </th>
                                            <th class="center">
                                                <i class="ace-icon fa fa-globe bigger-110 hidden-480"></i> 
                                                Perfil
                                            </th>

                                            <th class="center">
                                                <i class="ace-icon fa fa-star-half-empty bigger-110  hidden-480"></i> 
                                                Status
                                            </th>

                                            <th class="center">
                                                <i class="ace-icon fa fa-calendar bigger-110 hidden-480"></i>  
                                                Data de cadastro
                                            </th>

                                            <th class="center">
                                                A��es
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $read = new UsuarioControler();
                                        $array = $read->selectUserAllControl();
                                        foreach ($array as $value) {
                                            ?>                                                          
                                            <tr>
                                                <td class="center">
                                                    <?= $value->id_user ?>   
                                                </td>
                                                <td class="center">
                                                    <?= $value->dt_user ?>  
                                                    <?php if ($value->dt_user == NULL) { ?>
                                                        <span class="label label-sm label-default">N�o informado</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="center">
                                                    <?= $value->dt_telefone ?>
                                                    <?php if ($value->dt_telefone == NULL) { ?>
                                                        <span class="label label-sm label-default">N�o informado</span>
                                                    <?php } ?>
                                                </td>                                                                                                                               
                                                <td class="center">
                                                    <?php if ($value->dt_perfil == NULL) { ?>
                                                        <span class="label label-sm label-default">N�o informado</span>
                                                    <?php } ?>
                                                    <?php if ($value->dt_perfil == 1) { ?>
                                                        <span class="label label-sm label-primary">Administrador</span>
                                                    <?php } ?>
                                                    <?php if ($value->dt_perfil == 2) { ?>
                                                        <span class="label label-sm label-danger">Funcion�rio</span>                                                                                                                                             
                                                    <?php } ?>
                                                </td>
                                                <td class="hidden-480 center center">
                                                    <?php if ($value->dt_status == 1) { ?>
                                                        <span class="label label-sm label-success">Ativo</span>
                                                    <?php } else { ?>
                                                        <span class="label label-sm label-danger">Inativo</span>                                                                                                                                             
                                                    <?php } ?>
                                                </td>

                                                <?php $data = $value->dt_date ?>
                                                <?php $explode = explode('-', $data) ?>
                                                <td class="center">                                                                        
                                                    <?= $explode[2] . "/" . $explode[1] . "/" . $explode[0] ?>
                                                    <?php if ($value->dt_date == NULL) { ?>
                                                        <span class="label label-sm label-default">N�o informado</span>
                                                    <?php } ?>
                                                </td>                                                                                                                                                                                                                                                                                                                                                                                                 
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons center">
                                                        <a href="#"  class="blue tooltip-info" data-rel="tooltip" title="Detalhes">
                                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                        </a>
                                                        <a href="../Controller/usuarioControler.php?action=findUserId&idUser=<?= $value->id_user ?>" class="green tooltip-info" data-rel="tooltip" title="Editar">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                        <a href="../Controller/usuarioControler.php?action=deleteUserById&idUser=<?= $value->id_user ?>" class="red tooltip-info" data-rel="tooltip" title="Deletar">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>  </div>


                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                        <span class="blue">
                                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                        <span class="green">
                                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- containert -->
                        </div><!--col-xs-12-->
                    </div><!--row-->
                </div><!-- main-content-inner -->
            </div><!--main-content-->
            <?php include_once '../template/footer.html'; ?>
        </div><!-- /.main-content -->
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <!-- page specific plugin scripts -->
        <script src="../assets/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="../assets/js/dataTables.buttons.min.js"></script>
        <script src="../assets/js/buttons.flash.min.js"></script>
        <script src="../assets/js/buttons.html5.min.js"></script>
        <script src="../assets/js/buttons.print.min.js"></script>
        <script src="../assets/js/buttons.colVis.min.js"></script>
        <script src="../assets/js/dataTables.select.min.js"></script>
        <!-- ace scripts -->
        <script src="../assets/js/ace-elements.min.js"></script>
        <script src="../assets/js/ace.min.js"></script>
        <script type="text/javascript">
            jQuery(function ($) {
                //initiate dataTables plugin
                var myTable =
                        $('#dynamic-table')
                        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                        .DataTable({

                            bAutoWidth: false,
                            "aoColumns": [
                                {"bSortable": true},
                                null, null, null, null, null,
                                {"bSortable": false}
                            ],
                            "aaSorting": [],
                            select: {
                                style: 'multi'
                            }
                        });
                $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

                new $.fn.dataTable.Buttons(myTable, {
                    buttons: [
                        {
                            "extend": "colvis",
                            "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            columns: ':not(:first):not(:last)'
                        },
                        {
                            "extend": "copy",
                            "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "csv",
                            "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "excel",
                            "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "pdf",
                            "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                            "className": "btn btn-white btn-primary btn-bold"
                        },
                        {
                            "extend": "print",
                            "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                            "className": "btn btn-white btn-primary btn-bold",
                            autoPrint: false,
                            message: 'This print was produced using the Print button for DataTables'
                        }
                    ]
                });
                myTable.buttons().container().appendTo($('.tableTools-container'));

                //style the message box
                var defaultCopyAction = myTable.button(1).action();
                myTable.button(1).action(function (e, dt, button, config) {
                    defaultCopyAction(e, dt, button, config);
                    $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });


                var defaultColvisAction = myTable.button(0).action();
                myTable.button(0).action(function (e, dt, button, config) {

                    defaultColvisAction(e, dt, button, config);


                    if ($('.dt-button-collection > .dropdown-menu').length == 0) {
                        $('.dt-button-collection')
                                .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                                .find('a').attr('href', '#').wrap("<li />")
                    }
                    $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                });

                ////

                setTimeout(function () {
                    $($('.tableTools-container')).find('a.dt-button').each(function () {
                        var div = $(this).find(' > div').first();
                        if (div.length == 1)
                            div.tooltip({container: 'body', title: div.parent().text()});
                        else
                            $(this).tooltip({container: 'body', title: $(this).text()});
                    });
                }, 500);

                myTable.on('select', function (e, dt, type, index) {
                    if (type === 'row') {
                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', true);
                    }
                });
                myTable.on('deselect', function (e, dt, type, index) {
                    if (type === 'row') {
                        $(myTable.row(index).node()).find('input:checkbox').prop('checked', false);
                    }
                });
                $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

                //select/deselect all rows according to table header checkbox
                $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function () {
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $('#dynamic-table').find('tbody > tr').each(function () {
                        var row = this;
                        if (th_checked)
                            myTable.row(row).select();
                        else
                            myTable.row(row).deselect();
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#dynamic-table').on('click', 'td input[type=checkbox]', function () {
                    var row = $(this).closest('tr').get(0);
                    if (this.checked)
                        myTable.row(row).deselect();
                    else
                        myTable.row(row).select();
                });



                $(document).on('click', '#dynamic-table .dropdown-toggle', function (e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });

                var active_class = 'active';
                $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                    var th_checked = this.checked;//checkbox inside "TH" table header

                    $(this).closest('table').find('tbody > tr').each(function () {
                        var row = this;
                        if (th_checked)
                            $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                        else
                            $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                    });
                });

                //select/deselect a row when the checkbox is checked/unchecked
                $('#simple-table').on('click', 'td input[type=checkbox]', function () {
                    var $row = $(this).closest('tr');
                    if ($row.is('.detail-row '))
                        return;
                    if (this.checked)
                        $row.addClass(active_class);
                    else
                        $row.removeClass(active_class);
                });
                $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

                //tooltip placement on right or left
                function tooltip_placement(context, source) {
                    var $source = $(source);
                    var $parent = $source.closest('table')
                    var off1 = $parent.offset();
                    var w1 = $parent.width();

                    var off2 = $source.offset();
                    //var w2 = $source.width();

                    if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                        return 'right';
                    return 'left';
                }
                $('.show-details-btn').on('click', function (e) {
                    e.preventDefault();
                    $(this).closest('tr').next().toggleClass('open');
                    $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
                });

            })
        </script>
        <?php if (isset($_GET['msg'])) { ?>

            <!--Mensagem Sucesso-->
            <?php if ($_GET['msg'] == 'sucessInsert') { ?>             
                <script type="text/javascript">
                    alert('Usu�rio cadastrado com Sucesso!');
                </script>
            <?php } elseif ($_GET['msg'] == 'errorInsert') { ?>
                <script type="text/javascript">
                    alert('Erro ao cadastrar usu�rio, tente novamente.');
                </script>  
            <?php } ?><!--FIM Mensagem Sucesso-->

            <!--Mensagem Alterar-->
            <?php if ($_GET['msg'] == 'sucessAlteracao') { ?>             
                <script type="text/javascript">
                    alert('Usu�rio Alterado com Sucesso!');
                </script>
            <?php } elseif ($_GET['msg'] == 'errorAlteracao') { ?>
                <script type="text/javascript">
                    alert('Erro ao alterar usu�rio, tente novamente.');
                </script>  
            <?php } ?><!--FIM Mensagem Sucesso-->

            <!--Mensagem Sucesso-->
            <?php if ($_GET['msg'] == 'sucessDelete') { ?>             
                <script type="text/javascript">
                    alert('Usu�rio Desativado com Sucesso!');
                </script>
            <?php } elseif ($_GET['msg'] == 'errorDelete') { ?>
                <script type="text/javascript">
                    alert('Erro ao Desativar Usu�rio!');
                </script>  
            <?php } ?><!--FIM Mensagem Sucesso-->


        <?php } ?>
    </body>
</html>