// Compass.cs
using UnityEngine;
using System.Collections;

public class Compass : MonoBehaviour
{
	public Transform playerController;
	public Texture compassBackground;
	public Texture playerBlip;
	
	private void OnGUI()
	{
		// background displaying top left in square of 128 pixels
		Rect compassBackgroundRect = new Rect(0,0, 128, 128);
		GUI.DrawTexture(compassBackgroundRect,compassBackground);
		GUI.DrawTexture(CalcPlayerBlipTextureRect(), playerBlip);
	}
	
	private Rect CalcPlayerBlipTextureRect()
	{
		// subtract 90, so North (0 degrees) is UP
		float angleDegrees = playerController.eulerAngles.y - 90;
		float angleRadians = angleDegrees * Mathf.Deg2Rad;
		
		// calculate (x,y) position given angle
		// blip distance from center is 16 pixels
		float blipX = 16 * Mathf.Cos(angleRadians);
		float blipY = 16 * Mathf.Sin(angleRadians);	
		
		// offset blip position relative to compass center (64,64)
		blipX += 64;
		blipY += 64;
		
		// stetch blip image to display in 10x10 pixel square
		return new Rect(blipX - 5, blipY - 5, 10, 10);
	}
}