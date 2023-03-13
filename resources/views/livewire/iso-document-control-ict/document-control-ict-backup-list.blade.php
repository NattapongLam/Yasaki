<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="card-title">รายการตรวจสอบอุปกรณ์ TAP Backup ภายในห้อง SERVER (YSK1-FM-ICT-07) ป=ปกติ ผ=ผิดปกติ ก=แก้ไข</h3>
                        </div>
                        <div class="col-3">   
                            <div class="hstack gap-3">
                                <input class="form-control float-right" type="text" placeholder="ค้นหา"
                                    aria-label="ค้นหา" wire:model="searchTerm">
                            <div class="vr"></div>
                            @livewire('iso-document-control-ict.document-control-ict-backup-form')
                            <button type="button" class="btn btn-primary w-sm waves-effect waves-light"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('btnCreateDocumentControlIctBackup')" disabled>
                            <i class="fas fa-plus"></i> เพิ่ม</button>                           
                            </div>     
                        </div>                
                    </div><hr>                                                      
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>ปี</th>
                                    <th>เดือน</th>
                                    <th>01</th>
                                    <th>02</th>
                                    <th>03</th>
                                    <th>04</th>
                                    <th>05</th>
                                    <th>06</th>
                                    <th>07</th>
                                    <th>08</th>
                                    <th>09</th>
                                    <th>10</th>
                                    <th>11</th>
                                    <th>12</th>
                                    <th>13</th>
                                    <th>14</th>
                                    <th>15</th>
                                    <th>16</th>
                                    <th>17</th>
                                    <th>18</th>
                                    <th>19</th>
                                    <th>20</th>
                                    <th>21</th>
                                    <th>22</th>
                                    <th>23</th>
                                    <th>24</th>
                                    <th>25</th>
                                    <th>26</th>
                                    <th>27</th>
                                    <th>28</th>
                                    <th>29</th>
                                    <th>30</th>
                                    <th>31</th>
                                    <th>แก้ไข</th>                               
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ictbackup as $item)
                                <tr>
                                    <th>{{$item->year_name}}</th>
                                    <td>{{$item->month_id}}</td>
                                    <td>{{$item->ck_day01}}</td>
                                    <td>{{$item->ck_day02}}</td>
                                    <td>{{$item->ck_day03}}</td>
                                    <td>{{$item->ck_day04}}</td>
                                    <td>{{$item->ck_day05}}</td>
                                    <td>{{$item->ck_day06}}</td>
                                    <td>{{$item->ck_day07}}</td>
                                    <td>{{$item->ck_day08}}</td>
                                    <td>{{$item->ck_day09}}</td>
                                    <td>{{$item->ck_day10}}</td>
                                    <td>{{$item->ck_day11}}</td>
                                    <td>{{$item->ck_day12}}</td>
                                    <td>{{$item->ck_day13}}</td>
                                    <td>{{$item->ck_day14}}</td>
                                    <td>{{$item->ck_day15}}</td>
                                    <td>{{$item->ck_day16}}</td>
                                    <td>{{$item->ck_day17}}</td>
                                    <td>{{$item->ck_day18}}</td>
                                    <td>{{$item->ck_day19}}</td>
                                    <td>{{$item->ck_day20}}</td>
                                    <td>{{$item->ck_day21}}</td>
                                    <td>{{$item->ck_day22}}</td>
                                    <td>{{$item->ck_day23}}</td>
                                    <td>{{$item->ck_day24}}</td>
                                    <td>{{$item->ck_day25}}</td>
                                    <td>{{$item->ck_day26}}</td>
                                    <td>{{$item->ck_day27}}</td>
                                    <td>{{$item->ck_day28}}</td>
                                    <td>{{$item->ck_day29}}</td>
                                    <td>{{$item->ck_day30}}</td>
                                    <td>{{$item->ck_day31}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo" wire:click="$emit('editDocumentControlIctBackup',{{$item->id}})">
                                            <i class="fas fa-edit"></i>
                                        </button>                                      
                                    </td>
                                </tr>     
                                @endforeach                                                        
                           </tbody>
                        </table>
                    </div><hr>
                    <div class="row">
                        {{$ictbackup->links()}}
                    </div>
                    <div class="row">
                        <div class="col-11"></div>
                        <div class="col-1"><p>R.01-20230311</p></div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>