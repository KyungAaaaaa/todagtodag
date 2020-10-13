<div id="review_pop">
	<div id="review_pop_content">
		<div><h4>리뷰 작성 </h4></div>
		<div class="hospital_info">
<!--			<img src='../img/todagtodag_logo.png' id="review_hospital_logo">-->
			<div><h1 id="review_hospital_name">병원이름</h1><p id="review_appointment_date">진료일</p></div>  </div>
		<p id="star_grade">
			<span>★</span>
			<span>★</span>
			<span>★</span>
			<span>★</span>
			<span>★</span>
		</p>

		<div><h2>친절</h2>
			<input type="radio" name="kindness" id="radio0" class="checkbox" value="1">
			<label for="radio0" class="input-label radio">불친절해요</label>
			<input type="radio" name="kindness" id="radio1" class="checkbox" value="2" checked>
			<label for="radio1" class="input-label radio">친절해요</label>
			<input type="radio" name="kindness" id="radio2" class="checkbox" value="3">
			<label for="radio2" class="input-label radio">최고에요</label>
		</div>
		<div><h2>대기 시간</h2>
			<input type="radio" name="wait_time" id="radio3" class="checkbox" value="1">
			<label for="radio3" class="input-label radio">오래걸려요</label>
			<input type="radio" name="wait_time" id="radio4" class="checkbox" value="2" checked>
			<label for="radio4" class="input-label radio">보통이에요</label>
			<input type="radio" name="wait_time" id="radio5" class="checkbox" value="3">
			<label for="radio5" class="input-label radio">빨라요</label></div>
		<div><h2>진료비</h2>
			<input type="radio" name="expense" id="radio6" class="checkbox" value="1">
			<label for="radio6" class="input-label radio">비싸요</label>
			<input type="radio" name="expense" id="radio7" class="checkbox" value="2" checked>
			<label for="radio7" class="input-label radio">보통이에요</label>
			<input type="radio" name="expense" id="radio8" class="checkbox" value="3">
			<label for="radio8" class="input-label radio">저렴해요</label></div>
		<p><textarea cols="50" rows="10" id="review_pop_comment" name="review_pop_comment" placeholder="리뷰를 작성해주세요!"></textarea></p>
		<div id="popup_btn">
			<button id="popup_write"> 등록</button>
			<button id="close">취소</button>
		</div>
	</div>