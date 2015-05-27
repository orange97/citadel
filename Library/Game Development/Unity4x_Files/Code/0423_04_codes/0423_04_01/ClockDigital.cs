// file: ClockDigital.cs
using UnityEngine;
using System.Collections;

using System;

public class ClockDigital : MonoBehaviour 
{
	private void OnGUI () 
	{
		DateTime time = DateTime.Now;
		string hour = LeadingZero( time.Hour );
		string minute = LeadingZero( time.Minute );
		string second = LeadingZero( time.Second );

//		GUILayout.Label( hour + ":" + minute + ":" +  second);		
		GUILayout.Label( "10:02:55");		
	}


	/**
	 * given an integer, return a 2-character string
	 * adding a leading zero if required
	 */
	private string LeadingZero(int n)
	{
		return n.ToString().PadLeft(2, '0');
	}
}
