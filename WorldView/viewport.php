<div id="viewport">
	<a-scene id="sky-box"embedded>
		<a-sky id="skyImage" src="images/1.jpg"
		animation__fade="property: components.material.material.color; type: color; from: #FFF; to: #000; dur: 300; startEvents: fade-out"
		animation__fadeback="property: components.material.material.color; type: color; from: #000; to: #FFF; dur: 300; startEvents: fade-in"></a-sky>
		<a-entity id="cam" camera="zoom: 1" look-controls >
			<a-cursor
			id="cursor"
			geometry="primitive: circle; radius: 0.000"
			material="color: black; shader: flat"
			></a-cursor>
		</a-entity>
	</a-scene>
	<br>
</div>