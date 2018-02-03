<form method="POST" action="insertuser.php">
    <h3>Add User</h3>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="firstName" placeholder="First Name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="lastName" placeholder="Last Name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="phoneNumber" placeholder="Phone Number (+2547------)" class="form-control" required
            pattern="^\+\d+$" minlength="10" title="Use and internal phone number format">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" placeholder="Username" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password" class="form-control" required
            minlength="6" maxlength="50">
    </div>
    <div class="form-group">
        <label>Department</label>
        <select name="department" class="form-control" required>
            <option value="HR">HR</option>
            <option value="Marketing">Marketing</option>
            <option value="Sales">Sales</option>
            <option value="CEO">CEO</option>
        </select>
    </div>
    <div class="form-group">
        <label>Role</label>
        <select name="role" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="departmentHead">Department Head</option>
            <option value="regulearEmployee">Regular Employee</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Add User</button>
    </div>
</form>

