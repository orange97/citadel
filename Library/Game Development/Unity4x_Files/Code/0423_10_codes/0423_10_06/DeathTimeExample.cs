// file: DeathTimeExample.cs
using UnityEngine;
using System.Collections;

public class DeathTimeExample : MonoBehaviour {
	public float deathDelay = 4f;
	private float deathTime = -1;
	
	private bool menuMode = true;
	
	private void OnGUI(){
		if( menuMode )
			GUIMenu();
		else
			GUITimeDisplay();
	}
	
	private void GUITimeDisplay(){
		float timeLeft = Time.time - deathTime;
		GUILayout.Label("time left before death = " + timeLeft);
		
	}
	
	private void GUIMenu(){
		bool startDyingButtonClicked = GUILayout.Button("Start dying");
		if( startDyingButtonClicked ){
			StartDying();
			menuMode = false;
		}
	}
	
	private void Update() {
		CheckDeath();
	}
	
	private void CheckDeath(){
		if( deathTime > 0 && Time.time > deathTime )
			Destroy( gameObject );
	}

	private void StartDying() {
		deathTime = Time.time + deathDelay;
	}
}
