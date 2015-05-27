// file: ClockAnalogue.cs
using UnityEngine;
using System.Collections;

using System;

public class ClockAnalogue : MonoBehaviour 
{
	public Transform secondHandPivot;
	public Transform minuteHandPivot;
	public Transform hourHandPivot;
	
	private void Update () 
	{
		DateTime time = DateTime.Now;
		float seconds = (float)time.Second;
		float minutes = (float)time.Minute;
		float hours12 = (float)time.Hour % 12;
		float angleSeconds = -360 * (seconds/60);
		float angleMinutes = -360 * (minutes/60);
		float angleHours = -360 * (hours12 / 12);
		
		// roate each hand
		secondHandPivot.localRotation = Quaternion.Euler(0f, 0f, angleSeconds);
		minuteHandPivot.localRotation = Quaternion.Euler(0f, 0f, angleMinutes);
		hourHandPivot.localRotation = Quaternion.Euler(0f, 0f, angleHours);
	}
}
