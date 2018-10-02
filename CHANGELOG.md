# Changelog

This package complain to the semantic versionic 2.0.0.
It is described [here](https://semver.org/).

## Unreleased

- configure variable (where the information is found, currently $_SERVER)

## Release 1.3.0 - 2018-10-02

### Added
+ Factory 
+ Tests for factory

### Modified
+ Updated serviceauthenticator dependencies

## Release 1.2.0 - 2018-10-02

The optional is removed because everyone should be able to use it own optional implementation.
Also the used library wasn't marked as stable.

### Added
+ Changelog file

### Removed
+ Optional

## Release 1.1.0 - 2018-10-01

### Added
+ licence informations (GNU GPL v3)

### Modified
+ composer package name

## Release 1.0.0 - 2018-09-17

Initial Release

### Added
+ Serviceprovider for Apache2 (working only with $_SERVER variables)