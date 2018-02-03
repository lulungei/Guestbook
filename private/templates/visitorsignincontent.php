
                    <form class="col-sm-6" action="visitorsignup.php" method="POST">
                        <h3>New Visitor?</h3>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label>ID or Passport number</label>
                            <input name="idNumber" type="text" class="form-control" placeholder="Enter your ID or passport number" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                           
                            <input name="phoneNumber" type="text" class="form-control" placeholder="Enter your phone number"
                            pattern="^\+\d+$" minlength="10" title="Use international phone number format">
                       
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success form-control">Sign In</button>
                        </div>    
                    </form>

                    <form class="col-sm-6" action="visitorsignin.php" method="POST">
                        <h3>Been here before?</h3>
                        <div class="form-group">
                            <label>ID or Passport number</label>
                            <input name="idNumber" type="text" class="form-control" 
            placeholder="Enter your ID or Passport Number" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success form-control">Sign In</button>
                        </div>    

                    </form>
              
  