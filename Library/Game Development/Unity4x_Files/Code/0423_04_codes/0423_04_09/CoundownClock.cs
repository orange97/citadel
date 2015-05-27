// file: CoundownClock.cs
using UnityEngine;
using System.Collections;

public class CoundownClock : MonoBehaviour 
{
	public int timerTotalSeconds = 5;
	
	public Texture2D time0;
	public Texture2D time10;
	public Texture2D time20;
	public Texture2D time30;
	public Texture2D time40;
	public Texture2D time50;
	public Texture2D time60;
	public Texture2D time70;
	public Texture2D time80;
	public Texture2D time90;
	public Texture2D time100;	

	private int countdownTimerDelay;
	private float countdownTimerStartTime;
	
	private void Awake(){
		CountdownTimerReset( timerTotalSeconds );
	}
	
	private void CountdownTimerReset(int delayInSeconds){
		countdownTimerDelay = delayInSeconds;
		countdownTimerStartTime = Time.time;
	}
    
	private void OnGUI(){
    	float propertionRemaining = (CountdownSecondsLeftFloat() / timerTotalSeconds);
    	GUILayout.Label( TimeRemainingImage(propertionRemaining) );
    }

	private float CountdownSecondsLeftFloat(){
		float elapsedSeconds = Time.time - countdownTimerStartTime;
		float secondsLeft = countdownTimerDelay - elapsedSeconds;
		return secondsLeft;
	}
	
	private Texture2D TimeRemainingImage(float propertionRemaining)
	{
		if( propertionRemaining > 0.9 ){	return time100;	}
		else if( propertionRemaining > 0.8 ){	return time90;	}
		else if( propertionRemaining > 0.7 ){	return time80;	}
		else if( propertionRemaining > 0.6 ){	return time70;	}
		else if( propertionRemaining > 0.5 ){	return time60;	}
		else if( propertionRemaining > 0.4 ){	return time50;	}
		else if( propertionRemaining > 0.3 ){	return time40;	}
		else if( propertionRemaining > 0.2 ){	return time30;	}
		else if( propertionRemaining > 0.1 ){	return time20;	}
		else if( propertionRemaining > 0 ){	return time10;	}
		else{	return time0;	}
	}


}