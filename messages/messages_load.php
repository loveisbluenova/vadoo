<div class="borders">

    <div class="col-md-4 listWrapper">
        <div class="innerBox" id="contacts-search">
            <form autocomplete="off" class="form-inline margin-none">
                <div class="input-group input-group-sm">
                    <input class="form-control" id="contacts-search-input" placeholder="<?php echo $filter_contacts;?>..." type="text">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-xs pull-right"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div id="tabs-control" class="bg-gray strong border-top border-bottom text-center">
        	<div class="col-md-6 padding-none"><a href="#" id="tab-chats" class="tab border-right active-tab">
            	<div id="loadingDiv-chats"></div>
            	<span class="glyphicon glyphicon-envelope"></span> <?php echo $chats;?></a>
            </div>
            <div class="col-md-6 padding-none"><a href="#" id="tab-contacts" class="tab">
            	<div id="loadingDiv-contacts"></div>
            	<span class="glyphicon glyphicon-user"></span> <?php echo $contacts;?></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php 	
			$init_load = true;
			$chat_tab = true;
			include('html_chat_list.php'); 
		?>
    </div>

    <div>
        <div id="loadingDiv"></div>
        <div id="errorDiv"></div>
        <div id="text-messages-request">
            <p class="innerBox"><?php echo $select_contacts; ?></p>
        </div>
    </div>

</div>