<div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <table class="table" style="margin-top:20px;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Asset Name</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Branch</th>
                                                    <th scope="col">Return</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                for($i = 0; $i < $res_count; $i = $i+1)
                                 {
                          ?>
                                                    <tr>
                                                        <th scope='row'>
                                                            <?php echo $res[$i]['name'] ?>
                                                        </th>


                                                        <th scope='row'>
                                                            <?php echo $res[$i]['asset_name'] ?>
                                                        </th>
                                                        <th scope='row'>
                                                            <?php echo $res[$i]['quantity'] ?>
                                                        </th>

                                                        <th scope='row'>
                                                            <?php echo $res[$i]['branch'];?>
                                                        </th>
                                                        
                                                        <th scope='row'>
                                                            <a href="" class="btn btn-danger">Return</a>
                                                        </th>

                                                    </tr>
                                                    <?php } ?>


                                            </tbody>
                                        </table>

                                    </div>