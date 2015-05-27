// file: CountdownTimer.cs
using UnityEngine;
using System.Collections;

public class CountdownTimer : MonoBehaviour {
	private float secondsLeft = 3f;
	
	private void OnGUI(){
		if( secondsLeft > 0)
			GUILayout.Label("Countdown seconds remaining = " + (int)secondsLeft	 );
		else
			GUILayout.Label("countdown has finished");
		
	}
	
	private void Update(){
		secondsLeft -= Time.deltaTime;
	}
}
