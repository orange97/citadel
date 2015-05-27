// file: CountdownGraphical.cs
using UnityEngine;
using System.Collections;

public class CountdownGraphical : MonoBehaviour {
	public Texture2D imageDigit1;
	public Texture2D imageDigit2;
	public Texture2D imageDigit3;
	public Texture2D imageDigit4;
	public Texture2D imageDigit5;
	public Texture2D imageBlastOffText;
	
	private int countdownTimerDelay;
	private float countdownTimerStartTime;
	
	void Awake(){
		// reset out countdown timer for 3 seconds
		CountdownTimerReset( 5 );
	}
	
	void OnGUI(){
		GUILayout.Label( CountdownTimerImage() );
	}
	
	void CountdownTimerReset(int delayInSeconds){
		countdownTimerDelay = delayInSeconds;
		countdownTimerStartTime = Time.time;
	}
	
	int CountdownTimerSecondsRemaining(){
		int elapsedSeconds = (int)(Time.time - countdownTimerStartTime);
		int secondsLeft = (countdownTimerDelay - elapsedSeconds);
		return secondsLeft;
	}

	Texture2D CountdownTimerImage(){
		switch( CountdownTimerSecondsRemaining() ){
		case 5:
			return imageDigit5;
		case 4:
			return imageDigit4;
		case 3:
			return imageDigit3;
		case 2:
			return imageDigit2;
		case 1:
			return imageDigit1;
		default:
			return imageBlastOffText;
		}
	}
}