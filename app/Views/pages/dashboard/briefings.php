<div class="row">
    <div class="col-12">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-8">
		</div>
        <div class="col-12 col-sm-6 col-md-4 pb-4">
            <form method="post">
                <div class="input-group">

                    <input type="text" value="<?php if ($search) {
                                                    echo $search;
                                                } ?>" class="form-control border-right-0" placeholder="Procurar" name="search">
                    <div class="input-group-append ">
                        <button class="form-control border-left-0" style="border-top-left-radius: 0 !important; border-bottom-left-radius: 0 !important;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                </div>

                
<?php $typeslug = 'edit'; ?>


            </form>
        </div>

    </div>
    <div class="col-12">
        <table class="table table-striped border alert-secondary bg-transparent">
            <thead class="hidden-sm">
                <tr>
                    <th scope="col" class="text-center text-md-left">Nome</th>
                     <th scope="col" class="text-center">Criado em</th>
					 <th scope="col" class="text-center">Projetos</th>
                   
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($query as &$value) { ?>
                    <tr data-user="<?php echo $value->id; ?>" id="user-<?php echo $value->id; ?>">
                        <th class="text-center text-md-left">
                            <div class="btn btn-block text-center text-md-left font-weight-bold text-dark px-0"><?php echo $value->name; ?></div>
                            <div class="d-block d-md-none">
							
							<small>Criado em <?php $date=date_create($value->created_at); 
echo date_format($date,"d/m/Y"); ?></small>
                                <hr>
                                <div class=" font-weight-light"> <?php
								$valuecont = $value->cont;
								$plural = '';
									if($valuecont) { echo $valuecont; 
									if ($valuecont != 1)
									{
										$plural = 's';
									}
									}
									else { echo 'Nenhum'; }
								
								
								
								
								
								
								?> projeto<?php echo $plural; ?></div>
                                <hr>

                                <div class="form-row">
                                    <?php
                                        $col = 6;
                                        if ($logged->type < 2) {

                                            $col = 3;

                                            ?>
                                        <div class="col-3">
                                            <button data-type="briefing" data-user="<?php echo $value->id; ?>" data-name="<?php echo $value->name; ?>" class="idcard-btn btn btn-small btn-block btn-dark text-warning"><i class="fas fa-question"></i></button>


                                        </div>

                                      
                                    <?php } ?>
                                    <div class="col-3">
                                    <a href="<?php



echo base_url('/Briefing/copy/' . $value->slug); ?>" class="btn btn-small btn-warning text-dark  btn-block"><i class="fas fa-copy"></i></a>

                                    </div>
                                    <div class="col-<?php echo $col; ?>">
									<?php if($value->cont){?>
									 <button disabled  class="btn btn-small btn-secondary  btn-block"><i class="fas fa-user-edit"></i></button>
                            
									 <?php } else { ?>
                                        <a href="<?php



                                                        echo base_url('/Briefing/' . $typeslug . '/' . $value->slug); ?>" class="btn btn-small btn-info  btn-block"><i class="fas fa-user-edit"></i></a>
                                    
									<?php }  ?>
									</div>
                                    <div class="col-<?php echo $col; ?>">
									   <?php if($value->cont){?>
									   <button disabled  class="btn-block btn btn-small btn-secondary"><i class="fas fa-trash"></i></button>
									
									   <?php } else { ?>
                                        <button data-name="<?php echo $value->name; ?>" data-user="<?php echo $value->id; ?>"  class="delete-btn btn-block btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
									<?php }  ?>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <td class="hidden-sm text-center">
                            <div class="btn text-center px-0 bg-transparent text-dark"><?php $date=date_create($value->created_at); 
echo date_format($date,"d/m/Y"); ?></div>
                        </td>
						<td class="hidden-sm text-center">
                            <div class="btn text-center px-0 bg-transparent text-dark"><?php echo $value->cont; ?></div>
                        </td>
                        <td class="hidden-sm text-right">


                            <button data-type="briefing" data-user="<?php echo $value->id; ?>" data-name="<?php echo $value->name; ?>" class="idcard-btn btn btn-small  btn-dark text-warning"><i class="fas fa-question"></i></button>
 

                            <a href="<?php



echo base_url('/Briefing/copy/' . $value->slug); ?>" class="btn btn-small btn-warning text-dark "><i class="fas fa-copy"></i></a>

                            <?php if($value->cont){?>
									 <button disabled  class="btn btn-small btn-secondary"><i class="fas fa-user-edit"></i></button>
                            
									 <?php } else { ?>
                                        <a href="<?php



                                                        echo base_url('/Briefing/' . $typeslug . '/' . $value->slug); ?>" class="btn btn-small btn-info"><i class="fas fa-user-edit"></i></a>
                                    
									<?php }  ?>

                         <?php if($value->cont){?>
						 <button disabled class="btn btn-small btn-secondary"><i class="fas fa-trash"></i></button>
						 <?php
						 } else { ?>
						 <button data-name="<?php echo $value->name; ?>" data-user="<?php echo $value->id; ?>"  class="delete-btn btn btn-small btn-danger"><i class="fas fa-trash"></i></button>
						 <?php } ?>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $modals; ?>
