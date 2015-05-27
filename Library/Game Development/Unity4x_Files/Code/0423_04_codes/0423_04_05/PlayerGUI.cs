// file: PlayerGUI.cs
using UnityEngine;
using System.Collections;

public class PlayerGUI : MonoBehaviour 
{
	public Texture heartImage;
	private int livesLeft = 5;
	
	private void OnGUI()
	{
		Rect r = new Rect(0,0,Screen.width, Screen.height);
		GUILayout.BeginArea(r);
		GUILayout.BeginHorizontal();
		
		ImagesForInteger(livesLeft, heartImage);
		
		GUILayout.FlexibleSpace();
		GUILayout.EndHorizontal();
		GUILayout.EndArea();
	}
	
	private void ImagesForInteger(int total, Texture icon)
	{
		for(int i=0; i < total; i++)
		{
			GUILayout.Label(icon);
		}
	}
}
