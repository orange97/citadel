// file: CubeAnimMethodsDropDownList.cs
using UnityEngine;
using System.Collections;

public class CubeAnimMethodsDropDownList : MonoBehaviour {
	public AudioClip waterDropSound1;
	public AudioClip waterDropSound2;
	
	public enum ClipName {
		WATER_DROP1,
		WATER_DROP2
	}
	
	public void PlayClipFromList(ClipName clipInt) {
		AudioClip clip = GetClip( clipInt );
		audio.PlayOneShot(clip);
	}
	
	private AudioClip GetClip(ClipName clipInt) {
		switch( clipInt )
		{
		case ClipName.WATER_DROP1:
			return waterDropSound1;
		case ClipName.WATER_DROP2:
		default:
			return waterDropSound1;
		}
	}
}