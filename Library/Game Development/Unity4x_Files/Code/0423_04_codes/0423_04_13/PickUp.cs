// file: PickUp.cs
using UnityEngine;
using System.Collections;

public class PickUp : MonoBehaviour 
{
	public enum PickUpCategory
	{
		KEY, HEALTH, SCORE
	}
	
	public Texture icon;
	public int points;
	public string fitsLockTag;
	public PickUpCategory catgegory;
	
}
