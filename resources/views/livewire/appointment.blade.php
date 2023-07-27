<div x-data="{
    d_id:'',
    selectDoctor:'{{session("doctor_id")}}',
    doctorClickStyle:'flex px-5 py-5 rounded-lg border-[#212245] border-t border-r-4 border-b-4 border-l mt-5',
    defaultStyle:'flex px-5 py-5 shadow-[0px_3px_8px_0px_rgba(0,0,0,0.14)] rounded-lg mt-5',
    
    {{-- Slots OPerations --}}
    slotClick:'',
    slotBookStyle:'text-[#6B7280] text-xs border border-[#D1D5D8] text-center py-2 ',
    slotClickStyle:'text-white text-xs border border-[#878787] bg-[#212245] text-center py-2 cursor-pointer',
    slotDefaultStyle:'text-xs border border-[#878787] text-center py-2 cursor-pointer',


    {{-- date click --}}
    
}">

    <div class=" container px-5 my-5 mx-auto">
        <!-- Schedule section start  -->
        <h1 class=" text-lg font-bold leading-none hidden lg:block text-center font-title">Schedule Your Online Consultation
        </h1>
        <div class=" flex gap-3">
            <div class=" mt-1 md:hidden">
                <img src="/assets/icons/arrow.svg" alt="">
            </div>
            <div>
                <h1 class=" text-lg font-bold leading-none md:hidden font-title">Schedule Your Online</h1>
                <h1 class=" text-lg font-bold leading-none md:hidden font-title">Consultation</h1>
            </div>
        </div>
        <!-- Schedule section end  -->
        
       
        <!-- Paragraph section start  -->
        <div class=" mt-4 lg:mt-10">
            <p class=" text-sm text-[#6B7280] md:text-center">Choose your preferred doctor and consultation slot.
                Fill in your details and you'll be one step away from receiving expert care from the comfort of your
                home.
            </p>
        </div>
        <!-- Paragraph section end  -->

        <!-- Choose Your Doctor section start  -->
        <div class=" mt-7 lg:mt-10">
            <div>
                <h1 class=" font-medium md:text-center md:font-bold">Choose Your Doctor</h1>
            </div>

            <!-- Desktop male & female flex section start  -->
            <div class=" md:flex justify-between gap-16 2xl:mx-96 lg:mt-7">
                <!-- doctors section start  -->
                @foreach ($doctors as $doctor)
                    {{-- {{$doctor}} --}}
                
                <div wire:click="selectDoctor('{{$doctor->id}}','{{$doctor->name}}','{{$doctor->fee}}')" @click="selectDoctor={{$doctor->id}};d_id={{$doctor->id}}" :class="selectDoctor=={{$doctor->id}}? doctorClickStyle : defaultStyle ">
                    <div>
                        <img src="/assets/icons/{{$doctor->images}}" alt="" class=" w-20">
                    </div>
                    <div class=" ml-5">
                        <h3 class=" text-sm font-medium md:font-bold">{{$doctor->name}}</h3>
                        <span class=" text-xs text-[#6B7280]">{{$doctor->specialization}}.</span>
                            <h6 class=" text-sm font-semibold mt-3">{{$doctor->fee}}</</h6>
                    </div>
                    <div>
                        <input type="checkbox" name="" id="" class=" w-4 h-4 accent-[#212245]"  :checked=selectDoctor=={{$doctor->id}}>
                    </div>
                </div>
                @endforeach
                <!-- doctors section end  -->

               
            </div>
            <!-- Desktop male & female flex section end  -->
            {{-- checking purpose code this line <p>{{$selectDoctor}}::{{$currentDate}};;;;{{date('y.m.d', strtotime($currentDate))}}</p>  --}}

        </div>
        <!-- Choose Your Doctor section end  -->
        
        <!-- June section start  -->
        <div class=" mt-6 lg:mt-12 2xl:mx-96" x-data="{
            dateClick:'',
            dateClickStyle:'border border-[#878787] bg-[#212245] text-white text-center px-5 py-2 rounded cursor-pointer',
            dateDefaultStyle:'border border-[#878787] text-center px-5 py-2 rounded cursor-pointer'   
    
        }">
       
            <div class=" mb-4">
                <h1 class=" font-medium">{{$currentMonth}}</h1>
            </div>
            <!-- Date section start  -->
            <div class=" flex gap-4 lg:gap-10 overflow-x-auto lg:mt-10">
                @foreach($weeksDate as $week)
              
                 <div @click="dateClick='{{$currentDate_copy}}'"  wire:click="selectDate('{{$currentDate_copy}}')" :class="dateClick=='{{$currentDate_copy}}'? dateClickStyle : dateDefaultStyle">
                    <h6 class=" font-medium text-xs">{{strtoupper(substr($currentDate_copy,0,3))}}</h6>
                    <h6 class=" font-normal text-xs mt-2">{{substr($currentDate_copy,-9,-7)}}</h6>
                    <?php  $nextDate = date('l, F j, Y ', strtotime($currentDate_copy .' +1 day'));  $currentDate_copy = $nextDate;    ?>
                      {{-- <?php  ?>  --}}
                   
                   </div>
                
                @endforeach
            </div>
           
            <!-- Date section end  -->
        
        <!-- June section end  -->
        
        <!-- Morning Slots section start  -->
       
        <div class=" mt-6 lg:mt-16 2xl:mx-96">
            <div class=" mb-4">
                <h1 class=" font-medium">Morning Slots</h1></p>
            </div>
           
            <!-- Time section start  -->
            <div class=" grid grid-cols-3 gap-4 lg:gap-10 lg:grid-cols-6 lg:mt-10">
                @foreach($morningSlots as $morningSlot)
                    {{-- first check currentDate --}}
                    @if($currentDate===$selectDate)
                      
                        <?Php $dateTime=date('Y-m-d',strtotime($selectDate))." ".date('H:i:s',strtotime($morningSlot));?>
                    
                        {{-- second check currentTime expiry or not  --}}
                        @if(date('H:i',strtotime($currentTime))>date('H:i',strtotime($morningSlot)))
                           
                                <div  :class="slotBookStyle ">{{$morningSlot}}</div>
                        @else
                        {{-- check that Time and Doctor and date exists or not --}}
                             @if(array_key_exists($dateTime, $table_booked) && $table_booked[$dateTime]==$selectDoctor)

                                   <div  :class=" slotBookStyle ">{{$morningSlot}}</div>
                             @else
                                {{-- <p>sajdfas</p> --}}
                                   <div wire:click="selectTime('{{$morningSlot}}')" @click="slotClick='{{$morningSlot}}'" :class="slotClick=='{{$morningSlot}}'? slotClickStyle:slotDefaultStyle ">{{$morningSlot}}</div>
                             @endif
                        @endif
                        {{-- end second check currentTime --}}
                    @else
                      {{-- not currentDate then run below this code --}}
                      <?Php $dateTime=date('Y-m-d',strtotime($selectDate))." ".date('H:i:s',strtotime($morningSlot));?>
                        
                             {{-- if booked then run if and not booked then else part work below --}} 
                             @if(array_key_exists($dateTime, $table_booked) && $table_booked[$dateTime]==$selectDoctor)
                               
                                   <div  :class=" slotBookStyle ">{{$morningSlot}}</div>
                             @else
                                   <div wire:click="selectTime('{{$morningSlot}}')" @click="slotClick='{{$morningSlot}}'" :class="slotClick=='{{$morningSlot}}'? slotClickStyle:slotDefaultStyle ">{{$morningSlot}}</div>
                            @endif
                       {{-- not currentDate then run below this code --}}
                    @endif
                    @endforeach
            

               
            </div>
           
            
            <!-- Time section end  -->
        </div>
        <!-- Morning Slots section end  -->
     
        <!-- Afternoon Slots section start  -->
        <div class=" mt-6 lg:mt-16 2xl:mx-96">
            <div class=" mb-4">
                <h1 class=" font-medium">Afternoon Slots</h1>
            </div>

            <!-- Time section start  -->
            <div class=" grid grid-cols-3 gap-4 lg:gap-10 lg:grid-cols-6 lg:mt-10">
                
                    @foreach($afternoonSlots as $afternoonSlot)
                        {{-- first check currentDate --}}
                        @if($currentDate===$selectDate)
                            
                            <?Php $dateTime=date('Y-m-d',strtotime($selectDate))." ".date('H:i:s',strtotime($afternoonSlot));?>
                        
                            {{-- second check currentTime expiry or not  --}}
                            @if(date('H:i',strtotime($currentTime))>date('H:i',strtotime($afternoonSlot)))
                               
                                    <div  :class="slotBookStyle ">{{$afternoonSlot}}</div>
                            @else
                            {{-- check that Time and Doctor and date exists or not --}}
                                 @if(array_key_exists($dateTime, $table_booked) && $table_booked[$dateTime]==$selectDoctor)
    
                                       <div  :class=" slotBookStyle ">{{$afternoonSlot}}</div>
                                 @else
                                    {{-- <p>sajdfas</p> --}}
                                       <div wire:click="selectTime('{{$afternoonSlot}}')" @click="slotClick='{{$afternoonSlot}}'" :class="slotClick=='{{$afternoonSlot}}'? slotClickStyle:slotDefaultStyle ">{{$afternoonSlot}}</div>
                                 @endif
                            @endif
                            {{-- end second check currentTime --}}
                        @else
                          {{-- not currentDate then run below this code --}}
                          <?Php $dateTime=date('Y-m-d',strtotime($selectDate))." ".date('H:i:s',strtotime($afternoonSlot));?>
                            
                                 {{-- if booked then run if and not booked then else part work below --}} 
                                 @if(array_key_exists($dateTime, $table_booked) && $table_booked[$dateTime]==$selectDoctor)
                                   
                                       <div  :class=" slotBookStyle ">{{$afternoonSlot}}</div>
                                 @else
                                       <div wire:click="selectTime('{{$afternoonSlot}}')" @click="slotClick='{{$afternoonSlot}}'" :class="slotClick=='{{$afternoonSlot}}'? slotClickStyle:slotDefaultStyle ">{{$afternoonSlot}}</div>
                                @endif
                           {{-- not currentDate then run below this code --}}
                        @endif
                        @endforeach
                
    
            </div>
            <!-- Time section end  -->
        </div>
        <!-- Afternoon Slots section end  -->

        <!-- Evening Slots section start  -->
        <div class=" mt-6 lg:mt-16 2xl:mx-96">
            <div class=" mb-4">
                <h1 class=" font-medium">Evening Slots</h1>
            </div>

            <!-- Time section start  -->
            <div class=" grid grid-cols-3 gap-4 lg:gap-10 lg:grid-cols-6 lg:mt-10">
                
                
                    @foreach($eveningSlots as $eveningSlot)
                        {{-- first check currentDate --}}
                        @if($currentDate===$selectDate)
                            
                            <?Php $dateTime=date('Y-m-d',strtotime($selectDate))." ".date('H:i:s',strtotime($eveningSlot));?>
                        
                            {{-- second check currentTime expiry or not  --}}
                            @if(date('H:i',strtotime($currentTime))>date('H:i',strtotime($eveningSlot)))
                               
                                    <div  :class="slotBookStyle ">{{date('h:i:s A',strtotime($eveningSlot))}}</div>
                            @else
                            {{-- check that Time and Doctor and date exists or not --}}
                                 @if(array_key_exists($dateTime, $table_booked) && $table_booked[$dateTime]==$selectDoctor)
    
                                       <div  :class=" slotBookStyle ">{{date('h:i:s A',strtotime($eveningSlot))}}</div>
                                 @else
                                    {{-- <p>sajdfas</p> --}}
                                       <div wire:click="selectTime('{{$eveningSlot}}')" @click="slotClick='{{$eveningSlot}}'" :class="slotClick=='{{$eveningSlot}}'? slotClickStyle:slotDefaultStyle ">{{date('h:i:s A',strtotime($eveningSlot))}}</div>
                                 @endif
                            @endif
                            {{-- end second check currentTime --}}
                        @else
                          {{-- not currentDate then run below this code --}}
                          <?Php $dateTime=date('Y-m-d',strtotime($selectDate))." ".date('H:i:s',strtotime($eveningSlot));?>
                            
                                 {{-- if booked then run if and not booked then else part work below --}} 
                                 @if(array_key_exists($dateTime, $table_booked) && $table_booked[$dateTime]==$selectDoctor)
                                   
                                       <div  :class=" slotBookStyle ">{{date('h:i:s A',strtotime($eveningSlot))}}</div>
                                 @else
                                       <div wire:click="selectTime('{{$eveningSlot}}')" @click="slotClick='{{$eveningSlot}}'" :class="slotClick=='{{$eveningSlot}}'? slotClickStyle:slotDefaultStyle ">{{date('h:i A',strtotime($eveningSlot))}}</div>
                                @endif
                           {{-- not currentDate then run below this code --}}
                        @endif
                        @endforeach
                
    
             
               
            </div>
            <!-- Time section end  -->
        </div>
        <!-- Evening Slots section end  -->
    
        <!-- Button section start  -->
        <div class=" flex justify-center mt-10 lg:mt-20">
            <button
            class="text-black lg:w-[40%] bg-[#A4CB6A] font-semibold mb-6 w-full text-center py-3 rounded-lg border-[#212245] border-t border-r-4 border-b-4 border-l" wire:click="goToNextPage('{{$selectDoctor}}','{{$selectDate}}','{{$selectTime}}')">Proceed
            to Next</button>
        </div>
        <!-- Button section end  -->
    </div>
</div>
