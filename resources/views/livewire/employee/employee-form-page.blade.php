<div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">ฟอร์มพนักงาน</h3>
            <form wire:submit.prevent="save">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="name" class="col-form-label">ชื่อ - นามสกุล</label>
                        <input type="text" name="name" id="name" placeholder="ชื่อ - นามสกุล" wire:model="name"
                        class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div id="name_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="email" class="col-form-label">E-Mail</label>
                        <input type="email" name="mc_name" id="email" placeholder="E-Mail" wire:model="email"
                        class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                        <div id="email_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="username" class="col-form-label">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" wire:model="username"
                        class="form-control @error('username') is-invalid @enderror">
                        @error('username')
                        <div id="username_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" wire:model="password"
                        class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div id="password_validation" class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="type" class="col-form-label">ประเภท</label>
                            <select class="form-control" wire:model="type">
                                <option value="Employee">Employee</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6" >
                        <div class="form-group">
                            <label for="avatar" class="col-form-label">Images</label>
                            <input class="form-control" type="file" id="avatar" name="avatar" wire:model="avatar">
                        </div>
                    </div><hr>
                    <button type="submit" class="btn btn-primary btn-lg waves-effect waves-light">บันทึกข้อมูล</button>    
                </div>
            </form>           
        </div>      
    </div>
</div>
